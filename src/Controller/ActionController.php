<?php
    namespace Controller;
    use App\DB;
    class ActionController {
        static function registerCom() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $passHint = $_POST['passHint'];
            $cate = $_POST['cate'];

            DB::query("INSERT INTO user (id, pass, pass_hint, cate) VALUES (?, ?, ?, ?)", [$id, $pass, $passHint, $cate]);
        }

        static function loginCom() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $msg = ''
            $user = DB::fetch("SELECT * FROM user WHERE id = ? AND pass = ?", [$id, $pass]);

            if($user) {
                $_SESSION['user'] = $user;
                $msg = 'true'
            } else {
                $msg = 'false'
            }

            echo $msg;
        }

        static function logout() {
            unset($_SESSION['user']);
            go('로그아웃 되었습니다.', '/');
        }
    }