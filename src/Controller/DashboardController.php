<?php
/**
 * Created by PhpStorm.
 * User: mazitovtr
 * Date: 15.05.19
 * Time: 16:15
 */

namespace App\Controller;

use App\Traits\RepositoryAwareTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    use RepositoryAwareTrait;

    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $purchases = $this->getPurchaseRequestRepository()->findAll();

        return $this->render('dashboard/index.html.twig', [
            'purchases' => $purchases
        ]);
    }
}