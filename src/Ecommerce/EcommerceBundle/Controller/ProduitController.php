<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProduitController extends Controller
{
    public function produitsAction()
    {
        return $this->render('@Ecommerce/Produit/produits.html.twig', array(
            // ...
        ));
    }

    public function presentationAction()
    {
        $produitHandler = $this->get('produit_handler');
        if($produitHandler->process()){
            return $this->redirectToRoute('produit_produits');
        }
        return $this->render('@Ecommerce/Produit/presentation.html.twig', array(
            'form' => $produitHandler->createView()
        ));
    }

    public function rechercheAction()
    {
        return $this->render('@Ecommerce/Produit/_recherche.html.twig');
    }

}
