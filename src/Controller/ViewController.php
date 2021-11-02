<?php
    namespace Controller;
    use App\DB;
    class ViewController {
        static function view() {
            if(!isset($_SESSION['user'])) go("로그인 해주세요", '/list');
            $id = $_GET['id'];
            $list = DB::fetch("SELECT l.*, IFNULL(lt.user_id, 0) user_id FROM
                               (SELECT * FROM list WHERE id = ?) AS l
                               LEFT JOIN (SELECT * FROM liketable WHERE user_id = ?) AS lt ON l.id = lt.code", [$id, $_SESSION['user']->id]);
            view('view', $list);
        }

        static function mypage() {
            $list = DB::fetchAll("SELECT * FROM list WHERE writer = ?", [$_SESSION['user']->id]);
            $list1 = DB::fetchAll("SELECT l.* FROM
                                   (SELECT * FROM liketable WHERE user_id = ?) AS lt
                                   INNER JOIN list AS l ON l.id = lt.code", [$_SESSION['user']->id]);
            
            view('mypage', $list, $list1);
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