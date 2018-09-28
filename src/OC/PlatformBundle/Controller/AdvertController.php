<?php

	namespace OC\PlatformBundle\Controller;
//heritage
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

	class AdvertController extends Controller
	{
		/*public function viewAction($id)
		{
			return new Response("Affichage de l'annonce d'id : ".$id);
		}

		public function viewSlugAction($slug, $year, $format)
	    {
	        return new Response(
	            "On pourrait afficher l'annonce correspondant au
	            slug '".$slug."', créée en ".$year." et au format ".$format."."
	        );
	    }

	    public function indexAction()
	    {
            $content = $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Audrey'));
			return new Response($content);
	    }

	       /* public function indexAction()
		    {
		        // On veut avoir l'URL de l'annonce d'id 5.
		        $url = $this->generateUrl(
		            'oc_platform_view', // 1er argument : le nom de la route
		            array('id' => 5)    // 2e argument : les valeurs des paramètres
		        );
		        // $url vaut « /platform/advert/5 »
		        
		        return new Response("L'URL de l'annonce d'id 5 est : ".$url);
		    }*/

		    public function indexAction($page)
		  {
		    // On ne sait pas combien de pages il y a
		    // Mais on sait qu'une page doit être supérieure ou égale à 1
		    if ($page < 1) {
		      // On déclenche une exception NotFoundHttpException, cela va afficher
		      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
		      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
		    }

		    // Ici, on récupérera la liste des annonces, puis on la passera au template

		    // Mais pour l'instant, on ne fait qu'appeler le template
		    return $this->render('OCPlatformBundle:Advert:index.html.twig');
		  }

		  public function viewAction($id)
		  {
		    // Ici, on récupérera l'annonce correspondante à l'id $id

		    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
		      'id' => $id
		    ));
		  }

		  public function addAction(Request $request)
		  {
		    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

		    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
		    if ($request->isMethod('POST')) {
		      // Ici, on s'occupera de la création et de la gestion du formulaire

		      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

		      // Puis on redirige vers la page de visualisation de cettte annonce
		      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
		    }

		    // Si on n'est pas en POST, alors on affiche le formulaire
		    return $this->render('OCPlatformBundle:Advert:add.html.twig');
		  }

		  public function editAction($id, Request $request)
		  {
		    // Ici, on récupérera l'annonce correspondante à $id

		    // Même mécanisme que pour l'ajout
		    if ($request->isMethod('POST')) {
		      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

		      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
		    }

		    return $this->render('OCPlatformBundle:Advert:edit.html.twig');
		  }

		  public function deleteAction($id)
		  {
		    // Ici, on récupérera l'annonce correspondant à $id

		    // Ici, on gérera la suppression de l'annonce en question

		    return $this->render('OCPlatformBundle:Advert:delete.html.twig');
		  }
	}

?>