<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BookTest extends TestCase
{
    /**
     * /books [GET]
     */
    public function testShouldReturnAllBooks(){

        $this->get("api/v1/books", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status_code',
            'status',
            'data' => [ '*' => [
                'name',
                'isbn',
                'authors',
                'number_of_pages',
                'publisher',
                'country',
                'release_date',
             ]
            ],
        ]);

    }

    /**
     * /books/id [GET]
     */
    public function testShouldReturnBook(){
        $this->get("api/v1/books/1", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status_code',
                'status',
                'data' => [ '*' => [
                    'name',
                    'isbn',
                    'authors',
                    'number_of_pages',
                    'publisher',
                    'country',
                    'release_date',
                ]
                ],
            ]
        );

    }

    /**
     * /books [POST]
     */
    public function testShouldCreateBook(){

        $parameters = [
            'name' => 'Time tells tale',
            'isbn' => '02932-1232-02',
            'authors' => [
                'Kunle Afolayan'
            ],
            'country' => 'Nigeria',
            'number_of_pages' => 23,
            'publisher' => 'Adeyemo',
            'release_date' => '2020-01-02',
        ];
        $this->post("api/v1/books", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status_code',
                'status',
                'data' => [
                    'book' => [
                        'name',
                        'isbn',
                        'authors',
                        'number_of_pages',
                        'publisher',
                        'country',
                        'release_date',
                    ]
                ],
            ]
        );

    }

    /**
     * /books/id [PUT]
     */
    public function testShouldUpdateBook(){

        $parameters = [
            'name' => 'Omolade kemi',
            'isbn' => '02932-1232-02',
            'authors' => [
                'Kunle Kola'
            ],
            'country' => 'Nigeria',
            'number_of_pages' => 23,
            'publisher' => 'Adeyemo',
            'release_date' => '2020-01-02',
        ];
        $this->patch("api/v1/books/1", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                'status_code',
                'status',
                'data' => [ '*' => [
                    'name',
                    'isbn',
                    'authors',
                    'number_of_pages',
                    'publisher',
                    'country',
                    'release_date',
                    ]
                ],
            ]
        );
    }

    /**
     * /books/id [DELETE]
     */
    public function testShouldDeleteBook(){

        $this->delete("api/v1/books/1", [], []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'status_code',
            'status',
            'message',
            'data'
        ]);
    }
}
