<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Livre;

class LivreApiTest extends TestCase
{
    use RefreshDatabase; // Réinitialise avant chaque test
    use WithFaker;

    public function testListeDeTousLesLivres()
    {
        // Créez un livre
        $livre = Livre::create(
            [
            'titre' => 'Sous marin',
            'auteur' => 'Bob Eponge',
            'date_publication' => '2023-08-22',
            ]
        );

        $livre2 = Livre::create(
            [
            'titre' => 'Ange et poisson',
            'auteur' => 'Lucifer',
            'date_publication' => '2023-08-22',
            ]
        );

        $response = $this->json('GET', '/api/livres');

        $response->assertStatus(200) // Vérifie le code de statut 200 (OK)
                ->assertJsonCount(2); // Vérifie si livres renvoyés
    }

    public function testRecuperationDeLivre()
    {
        // Créez un livre
        $livre = Livre::create([
            'titre' => 'Faire la vaisselle',
            'auteur' => 'M Propre',
            'date_publication' => '2023-08-22',
        ]);


        $response = $this->json('GET', '/api/livres/show/' . $livre->id);

        $response->assertStatus(200) // Vérifie le code de statut 200 (OK)
                ->assertJson([
                 'titre' => $livre->titre,
                 'auteur' => $livre->auteur,
                ]);
    }

    public function testCreationDeLivre()
    {
        $data = [
            'titre' => 'Batman contre un ver de terre',
            'auteur' => 'Robine Haie',
            'date_publication' => '2023-08-22',
        ];

        $response = $this->json('POST', '/api/livres/store/', $data);

        $response->assertStatus(201) // Vérifie le code de statut 201 (Created)
                 ->assertJson($data); // Vérifie que la réponse = données soumises
    }

    public function testMiseAJourDeLivre()
    {
        // Créez un livre dans la base de données
        $livre = Livre::create([
            'titre' => 'Mysogynie',
            'auteur' => 'Hubert Bonisseur de La Bath',
            'date_publication' => '2023-08-22',
        ]);


        $nouvellesDonnees = [
            'titre' => 'Avoir 10 à chaque oeil',
            'auteur' => 'Gilbert Montagnez',
            'date_publication' => '2023-08-22',
        ];

        $response = $this->json('PUT', '/api/livres/update/' . $livre->id, $nouvellesDonnees);

        $response->assertStatus(200) // Vérifie le code de statut 200 (OK)
                ->assertJson($nouvellesDonnees); // Vérifie que la réponse = données mises à jour.

        // Vérifiez données dans la base de données ont été mises à jour
        $livreActualise = Livre::find($livre->id);
        $this->assertEquals('Avoir 10 à chaque oeil', $livreActualise->titre);
        $this->assertEquals('Gilbert Montagnez', $livreActualise->auteur);
    }

    public function testSuppressionDeLivre()
    {
     // Créez un livre dans la base de données
        $livre = Livre::create([
            'titre' => 'Le temps des salopettes',
            'auteur' => 'Sarkozy',
            'date_publication' => '2023-08-22',
        ]);


        $response = $this->json('DELETE', '/api/livres/destroy/' . $livre->id);

        $response->assertStatus(204); // Vérifie le code de statut 204 (No Content)

        // le livre supprimé de la base de données.
        $this->assertNull(Livre::find($livre->id));
    }
}
