<?php
    namespace Controller;
    use App\DB;
    class ViewController {
        static function view() {
            if(!isset($_SESSION['user'])) go("로그인 해주세요", '/list');
            $id = $_GET['id'];
            DB::query("UPDATE list SET viewcnt = viewcnt + 1 WHERE id = ?", [$id]);

            $list = DB::fetch("SELECT * FROM
                               (SELECT * FROM list WHERE id = ?) AS l
                               LEFT JOIN (SELECT code, user_id FROM liketable WHERE user_id = ?) AS lt ON l.id = lt.code
                               LEFT JOIN (SELECT code, user_id AS u_id FROM savetable WHERE user_id = ?) AS st ON l.id = st.code",
                               [$id, $_SESSION['user']->id, $_SESSION['user']->id]);
            $review = DB::fetchAll("SELECT * FROM review WHERE code = ?", [$id]);
            view('view', $list, $review);
        }

        static function mypage() {
            $list = DB::fetchAll("SELECT * FROM list WHERE writer = ?", [$_SESSION['user']->id]);
            $list1 = DB::fetchAll("SELECT l.* FROM
                                   (SELECT * FROM liketable WHERE user_id = ?) AS lt
                                   INNER JOIN list AS l ON l.id = lt.code", [$_SESSION['user']->id]);
            $list2 = DB::fetchAll("SELECT l.* FROM
                                   (SELECT * FROM savetable WHERE user_id = ?) AS st
                                   INNER JOIN list AS l ON l.id = st.code", [$_SESSION['user']->id]);

            view('mypage', $list, $list1, $list2);
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

        static function edit() {
            if(!isset($_SESSION['user'])) go("권한이 없습니다", '/list');

            $id = $_GET['id'];
            $list = DB::fetch("SELECT * FROM list WHERE id = ?", [$id]);
            view1('edit', $list, $id);
        }
    }