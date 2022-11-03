<?php 

namespace App\Tests\Functional\Post;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PostTest extends WebTestCase{

   public function testBlogPageWorks(): void
   {

           $client = static::createClient(); 
           $client->request('GET', '/post'); 

           $this->assertResponseIsSuccessful();
          // $this->assertResponseStatusCodeSame(Response::HTTP_OK); 

           $this->assertSelectorExists('h1');
           $this->assertSelectorTextContains('h1', 'B\'blog : le blog créé de A a Z avec Symfony');

   }



   /**
    * Test de la pagination 
    */

   public function testPoginationWorks(): void
   
   {

        $client = static::createClient(); 
        $crawler = $client->request('GET', '/post'); 

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK); 
        $post = $crawler->filter('div.card'); 
        $this->assertEquals(5, \count($post));
        
        $link = $crawler->selectLink('2')->extract(['href'])[0]; 
        $crawler = $client->request(Request::METHOD_GET, $link);

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK);
        
        $post = $crawler->filter('div.card'); 
        $this->assertGreaterThanOrEqual(1, count($post));
      

          
   }


}