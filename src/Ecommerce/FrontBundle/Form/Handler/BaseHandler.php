<?php

namespace Ecommerce\FrontBundle\Form\Handler;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

abstract class BaseHandler
{
    protected $request;
    protected $security;

    /**
     * calls: - [setSecurity, ['@security.token_storage']]
     * @param TokenStorage $security
     */
    public function setSecurity(TokenStorage $security){
        $this->security = $security;
    }

    /**
     * calls: - [setRequest, ['@request_stack']]
     * @param RequestStack $requestStack
     */
    public function setRequest(RequestStack $requestStack){
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * @return mixed
     */
    public function getFrom(){
        return $this->form;
    }

    /**
     * @return mixed
     */
    public function createView(){
        return $this->form->createView();
    }

    public function process(){
        $this->form->handleRequest($this->request);

        if($this->request->isMethod('post') && $this->form->isValid()){
            $this->onSuccess();
            return true;
        }
        else{
            return false;
        }
    }

    public abstract function onSuccess();

}