<?php
    namespace Controller;
    use App\DB;
    class ViewController {
        static function view() {
            $id = $_GET['id'];
            $list = DB::fetch("SELECT * FROM list WHERE id = ?", [$id]);
            view('view', $list);
        }

        static function list() {
            $list = DB::fetchAll("SELECT * FROM list");
            view('list', $list);
        }

        static function login() {
            view('login');
        }

        static function write() {
            if(!isset($_SESSION['user'])) go("로그인 해주세요", '/list');
            view('write');
        }

        static function register() {
            view('register');
        }

        static function main() {
            view('main');
        }
    }