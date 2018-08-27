<?php

namespace vente\achatBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use vente\achatBundle\Form\ProduitType;
use vente\achatBundle\Entity\Produit;

class MVCController extends Controller {

    public function indexAction(Request $request) {
        $session = $request->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $prods = $em->getRepository('venteachatBundle:Produit')->findArray(array_keys($session->get('panier')));
        return $this->render('@venteachat/index.html.twig', array('panier' => $session->get('panier'), 'pro' => $prods));
    }

    public function displayAction($id, Request $request) {
        $session = $request->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }
        $panier = $session->get('panier');
        if (array_key_exists($id, $panier)) {
            if ($request->query->get('qte') != null) {
                $panier[$id] = $request->query->get('qte');
            }
        } else {
            if ($request->query->get('qte') != null) {
                $panier[$id] = $request->query->get('qte');
            } else {
                $panier[$id] = 0;
            }
        }
        $session->set('panier', $panier);
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('venteachatBundle:Produit')->find($id);
        $prods = $em->getRepository('venteachatBundle:Produit')->findArray(array_keys($session->get('panier')));
        return $this->render('@venteachat/MVCViews/display.html.twig', array('pts' => $produits, 'panier' => $session->get('panier'), 'produits' => $prods));
    }

    public function listProductsAction(Request $request) {
        $session = $request->getSession();
        if (!$session->has('panier')) {
            $session->set('panier', array());
        }
        $em = $this->getDoctrine()->getManager();
        $prods = $em->getRepository('venteachatBundle:Produit')->findArray(array_keys($session->get('panier')));
        $produits = $em->getRepository('venteachatBundle:Produit')->findAll();
        return $this->render('@venteachat/MVCViews/listProducts.html.twig', array('pts' => $produits, 'panier' => $session->get('panier'), 'produits' => $prods));
    }

    public function adminAddProduitAction(Request $req) {
        $p = new Produit();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProduitType::class, $p);
        if ($req->getMethod() == "POST") {
            $form->handleRequest($req);
            if ($form->isValid()) {
                $p = $em->persist($p);
                $em->flush();
                return $this->redirectToRoute('listProducts');
            }
        }
        return $this->render('@venteachat/MVCViews/admin/AddProduit.html.twig', array('form' => $form->createView()));
    }

    public function adminUpdateProduitAction(Request $req, $id) {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository("venteachatBundle:Produit")->find($id);
        $form = $this->createForm(ProduitType::class, $p);
        if ($req->getMethod() == "POST") {
            $form->handleRequest($req);
            if ($form->isValid()) {
                $p = $em->merge($p);
                $em->flush();
                return $this->redirectToRoute('listProducts');
            }
        }
        return $this->render('@venteachat/MVCViews/admin/UpdateProduit.html.twig', array('form' => $form->createView()));
    }

    public function adminDeleteProduitAction(Request $req, $id) {
        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository("venteachatBundle:Produit")->find($id);
        $form = $this->createForm(ProduitType::class, $p);
        if ($req->getMethod() == "POST") {
            $form->handleRequest($req);
            if ($form->isValid()) {
                $p = $em->remove($p);
                $em->flush();
                return $this->redirectToRoute('listProducts');
            }
        }
        return $this->render('@venteachat/MVCViews/admin/DeleteProduit.html.twig', array('form' => $form->createView()));
    }

    public function adminAction() {
        if (!$this->getUser()) {
            return $this->redirectToRoute('fos_user_security_login');
        }

        $em = $this->getDoctrine()->getManager();
        $p = $em->getRepository("venteachatBundle:Produit")->findAll();
        return $this->render('@venteachat/MVCViews/admin/admin.html.twig', array('produits' => $p));
    }

}
