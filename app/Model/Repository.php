<?php


namespace App\Model;



use GuzzleHttp\Client;

class Repository
{

    private $fire_ice_api_url = "https://www.anapioficeandfire.com/api/books";

    public function getExternalBooks($book_name)
    {
        $response = $this->makeExternalApiCall();
        if($response != null){
            $data = [];
            foreach ($response as $item){
                if($item['name'] == $book_name){
                    $new_item = [
                        'name' => $item['name'],
                        'isbn' => $item['isbn'],
                        'authors' => $item['authors'],
                        'number_of_pages' => $item['numberOfPages'],
                        'publisher' => $item['publisher'],
                        'country' => $item['country'],
                        'release_date' => $item['released'],
                    ];
                    array_push($data, $new_item);
                }
            }
            return new JsonResponse(200, 'success', $data);
        }
        else
            return new JsonResponse(500, 'Internal Server Error!');
    }

    private function makeExternalApiCall()
    {
        try {
            $client = new Client();
            $result = $client->get($this->fire_ice_api_url);
            return  json_decode( $result->getBody(), true );
        }catch (\GuzzleHttp\Exception\RequestException $exception){
            return null;
        }
    }

    public function createBook($inputs)
    {
        try
        {
            $book = new Book;
            $book->name = $inputs['name'];
            $book->isbn = $inputs['isbn'];
            $book->authors = $inputs['authors'];
            $book->country = $inputs['country'];
            $book->number_of_pages = $inputs['number_of_pages'];
            $book->publisher = $inputs['publisher'];
            $book->release_date = $inputs['release_date'];
            $result = $book->saveOrFail();
            if($result){
                $data[] = [ 'book' => (object) $inputs ];
                return new JsonResponse(201, 'success', $data);
            }
            else
                return new JsonResponse(404, 'Error occurs!');
        }catch (\Throwable $e) {
            return new JsonResponse(500, $e->getMessage());
        }
    }

    public function getBooks()
    {
        $books = Book::all();
        return new JsonResponse(200, 'success', $books);
    }

    public function updateBook($id, $inputs)
    {
        try
        {
            $book = Book::find($id);
            if($book != null){
                $book->name = $inputs['name'];
                $book->isbn  = $inputs['isbn'];
                $book->authors = $inputs['authors'];
                $book->country = $inputs['country'];
                $book->number_of_pages = $inputs['number_of_pages'];
                $book->publisher = $inputs['publisher'];
                $book->release_date = $inputs['release_date'];
                $result = $book->saveOrFail();
                if($result)
                    return new JsonResponse(200, 'success', $book);
                else
                    return new JsonResponse(500, 'Error occurs!');
            }
            else
                return new JsonResponse(404, 'not found');
        }catch (\Throwable $e) {
            return new JsonResponse(500, $e->getMessage());
        }
    }

    public function deleteBook(int $id)
    {
        $book = Book::find($id);
        if($book != null){
            $result = $book->delete();
            if($result){
                return new JsonResponse(204, 'success');
            }
            else
                return new JsonResponse(500, 'Error occurs!');
        }
        else
            return new JsonResponse(404, 'not found');
    }

    public function getBookById(int $id)
    {
        $book = Book::find($id);
        if($book != null)
            return new JsonResponse(200, 'success', $book);
        else
            return new JsonResponse(404, 'not found');

    }
}
