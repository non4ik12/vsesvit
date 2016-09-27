<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactType;

class BaseController extends Controller
{
    public function indexAction(Request $request)
    {
        return [
            'user' => $this->getUser(),
        ];
    }

	public function buildForm(FormBuilderInterface $builder, array $options)
	{
	    $builder->add('category', ContactType::class);
	}
}
