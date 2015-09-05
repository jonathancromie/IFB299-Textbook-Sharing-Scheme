<?php

namespace BookShare\Http\Controllers;

use Illuminate\Http\Request;

use BookShare\Http\Requests;
use BookShare\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

use BookShare\Book;
use View;

class Front extends Controller
{
    public function index() {
        return view('index', array('page' => 'index'));
    }

    /* 
     * REMOVE ALL THESE ONCE IN BOOKCONTROLER
     */

    public function share() {
        return view('share', array('page' => 'share'));
    }

    public function search() {
        return view('search', array('page' => 'search'));
    }

    public function results($search) {
        // $books = Book::where('name', 'LIKE', Input::get('search'), 'AND', 'author', 'LIKE', Input::get('search'), 'AND', 'isbn', 'LIKE', Input::get('search'))->get();
        // $books = Book::whereRaw('name like ', Input::get('search'), array(25))->get();

        $search = Input::get('search');
        $query = '%'.$search.'%';

        $books = Book::where('name', 'like', $query, 'and', 'author', 'like', $query, 'and', 'isbn', 'like', $query, 'and', 'faculty', 'like', $query)->get();

        // foreach ($books as $book) {
        //     echo ($book->book_id . " " . $book->name);
        //     echo ('<br>');
        // }

        return View::make('results')->with('books', $books);
    }

    // public function product_details($id) {
    //     return 'product details page';
    // }

    // public function product_categories() {
    //     return 'product categories page';
    // }

    // public function product_brands() {
    //     return 'product brands page';
    // }

    // public function blog() {
    //     return 'blog page';
    // }

    // public function blog_post($id) {
    //     return 'blog post page';
    // }

    // public function contact_us() {
    //     return 'contact us page';
    // }

    // public function login() {
    //     return 'login page';
    // }

    // public function logout() {
    //     return 'logout page';
    // }

    // public function cart() {
    //     return 'cart page';
    // }

    // public function checkout() {
    //     return 'checkout page';
    // }

    // public function search($query) {
    //     return "$query search page";
    // }
}
