<?php

namespace examen\chantierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class chantierController extends Controller
{
    public function indexAction()
    {
        return $this->render('chantierBundle:Default:index.html.twig');
    }
    
           public function afficherchantierAction() {
 $em=$this->getDoctrine()->getManager();
 $chantier=$em->getRepository("chantierBundle:chantier")->findAll();
   return $this->render('chantierBundle:Default:listedeschantiers.html.twig',array('chantier'=> $chantier));
        
    }
    
        
        public function ajouterouvrierAction()
    {
          $ouvrier = new \examen\chantierBundle\Entity\ouvrier();
          $form = $this->createFormBuilder($ouvrier)
                  ->add('nom')
                   ->add('prenom')
                   ->add('prixjour')
                   ->add('chantier')
         
                  ->add('Valider','submit')
                  ->getForm();
          $request = $this->getRequest();
          if($form->handleRequest($request)->isValid())
          {
              $em=  $this->getDoctrine()->getManager();
              $em->persist($ouvrier);
              $em->flush();
          }
        return $this->render('chantierBundle:Default:ajouterunouvrier.html.twig',array('form'=> $form->createView()));
    }

    
             public function detailchantierAction($id) {
 $em=$this->getDoctrine()->getManager();
 
 $chantier=$em->getRepository("chantierBundle:chantier")->find($id);
  $ouvrier=$em->getRepository("chantierBundle:ouvrier")->findBychantier($chantier);
  $nbouvrier = count($ouvrier);
  
//  foreach ($ouvrierx as $ouvrier)
//  {
//  $cout = (($ouvrierx->getPrixjour())*($chantier->getDuree()));
//  }
  
   return $this->render('chantierBundle:Default:detailchantier.html.twig',array('chantier'=> $chantier,'ouvrier'=>$ouvrier,'nbouv'=>$nbouvrier,));
        
    }
    
        public function supprimerouvrierAction($chantier)
    {
       
        $em = $this->getDoctrine()->getManager();
        $ouvrier = $em->getRepository("chantierBundle:ouvrier")->findBychantier($chantier);
        $em->remove($ouvrier);
        $em->flush();
        return $this->redirect($this->generateUrl("chantier_detailchantierpage"));
    

    }
}
