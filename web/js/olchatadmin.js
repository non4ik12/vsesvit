(function($) {
    $.widget('custom.olchatadmin', {
        userId: 0,
        storage: {
            userId: 'dmChatUserId',
            history: 'dmChatHistoriess'
        },
        _currentDialog: null,
        childs: null,
        options: {
            server: "http://vsesvit.local:8008",
            classes: {
                head: "dm-onchat-head",
                field: "dm-onchat-input",
                content: "dm-onchat-content",
                body: "dm-onchat-body",
                close_block: "dm-onchat-close",
                close_btn: "dm-onchat-close span",
                contacts: "dm-onchat-contacts",
                tabs: "dm-onchat-tabs"
            }
        },
        _create: function() {
        	console.log("init");
            this.socket = io.connect(this.options.server);
            this._setProperties();
        },
        _setProperties: function() {
            var self = this,
                childs = [];
            this.socket.on('show chat', function() {
                self._showDialog();
            });
            this.socket.on('to moderator', function(data) {
                if (!$('#'+data.uid).length) {
                    self._newDialog(data.uid);
                }
                self._appendNewMessage(data);
            });
            this._getUid();
            $.each(this.options.classes, function(a, b) {
                childs[a] = $(self.element).find('.' + b);
            });
            this.childs = childs;
            this._on(this.childs.head, {
                click: "_showDialog"
            });
            this._on(this.childs.field, {
                keypress: "_sendMessage"
            });
            this._on(this.childs.close_btn, {
                click: "_hideDialog"
            });
        },
        _sendMessage: function(e) {
            if (e.which == 13) {
                var data = {
                    msg: this.childs.field.val(),
                    uid: this._currentDialog.uid,
                    aid: this.userId
                }
                    
                this.childs.head.hide();
                this.socket.emit('to user', data);
                this._appendUserMsg(data);
                this._toHistory({
                    uid: data.uid,
                    sender: 'moderator',
                    message: data.msg
                });
                this.childs.field.val('');
            }
        },
        _showDialog: function() {
            var currentHistory = this._getHistory();
            if (currentHistory.length) {
                this.childs.head.hide();
            }
            this.childs.close_block.show();
            this.childs.body.fadeToggle(100);
            this._loadHistory();
        },
        _getHistory: function() {
            storageHistory = localStorage.getItem(this.storage.history);
            return (storageHistory) ? JSON.parse(storageHistory).currentHistory : [];
        },
        _hideDialog: function(e) {
            this.childs.head.show();
            this.childs.body.slideToggle(100);
            this.childs.close_block.hide();
        },
        _loadHistory: function() {
            var self = this,
                currentHistory = this._getHistory();
            if (currentHistory.length) {
                this.childs.head.hide();
                $.each(currentHistory, function(a, b) {
                    if (b.sender == 'user') {
                        self._appendUserMsg({uid: b.uid, msg: b.message});
                    } else {
                        self._appendAdminMsg(b.message);
                    }
                });
            }
        },
        _appendNewMessage: function(data) {
            this._appendAdminMsg(data);
            this._toHistory({
                uid: data.uid,
                sender: 'user',
                message: data.msg
            });
        },
        _appendAdminMsg: function(data) {
            var tab = $("#"+data.uid);
            tab.append(
                $("<div />")
                    .addClass("message-row")
                    .append(
                        $("<div />")
                            .addClass("message user-message").text(data.msg)
                    )
            );
            tab.animate({
                scrollTop: tab.prop("scrollHeight") - tab.height()
            }, 20);
        },
        _appendUserMsg: function(data) {
            console.log(data);
            this._currentDialog.content.append($("<div />").addClass("message-row").append($("<div />").addClass("dm-onchat-photo")).append($("<div />").addClass("message admin-message").text(data.msg)));
            this._currentDialog.content.animate({
                scrollTop: this._currentDialog.content.prop("scrollHeight") - this._currentDialog.content.height()
            }, 20);
        },
        _newDialog: function(uid) {
            var _item = $("<li />").data("uid", uid).attr({ role: "presentation"})
                    .append($("<a />").attr({
                        href:            "#"+uid,
                        "aria-controls": uid,
                        role:            "tab",
                        "data-toggle":   "tab"
                    }).text(uid))
                    .appendTo(this.childs.contacts.find('ul'));
            this._on(_item, {
                click: "_switchDialog"
            })
            this._currentDialog = {
                content: $("<div />").attr({
                    role: "tabpanel",
                    id: uid
                }).addClass("tab-pane")
                .appendTo(this.childs.tabs),
                uid: uid
            }
            this._scrollTab(this._currentDialog.content);
        },
        _getUid: function() {
            this.userId = localStorage.getItem(this.storage.userId);
            if (!this.userId) {
                this.userId = this._generateUid();
                localStorage.setItem(this.storage.userId, this.userId);
            }
            this.socket.emit("adminAuth", {
                uid: this.userId,
                page: window.location.href
            });
        },
        _switchDialog: function(e) {
            var uid = $(e.target).parent().data("uid");
            this._currentDialog = {
                content: $("#"+uid),
                uid: uid
            }
            this._scrollTab(this._currentDialog.content);
        },
        _scrollTab: function(block) {
            block.animate({
                scrollTop: block.prop("scrollHeight") - block.height()
            }, 20);

        },
        _generateUid: function() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        },
        _toHistory: function(data) {
            currentHistory = localStorage.getItem(this.storage.history);
            if (!currentHistory) {
                currentHistory = [];
            } else {
                currentHistory = JSON.parse(currentHistory).currentHistory;
            }
            currentHistory.push(data);
            localStorage.setItem(this.storage.history, JSON.stringify({
                currentHistory
            }));
        }
    })
})(jQuery);
