<?php
    namespace Controller;
    use App\DB;
    class ActionController {
        static function register() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $passchk = $_POST['passchk'];
            $passHint = $_POST['passHint'];
            $cate = null;

            $regEmail = '/^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i';
            $regPass = '/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,16}$/';

            $idchk = DB::fetch("SELECT * FROM user WHERE id = ?", [$id]);

            if($idchk) {
                go("존재하는 아이디입니다", '/register');
            } elseif ($pass != $passchk || !preg_match($regEmail, $passHint) || !preg_match($regPass, $pass)) {
                go("입력하신 정보를 확인해주세요", '/register');
            } else {
                DB::query("INSERT INTO user (id, pass, pass_hint, cate) VALUES (?, ?, ?, ?)", [$id, $pass, $passHint, $cate]);
                go("회원가입 되셨습니다", '/');
            }
            exit;
        }

        static function login() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];

            $user = DB::fetch("SELECT * FROM user WHERE id = ? AND pass = ?", [$id, $pass]);

            if($user) {
                $_SESSION['user'] = $user;
                go("로그인 되셨습니다.", "/");
            } else {
                go("아이디 또는 비밀번호가 일치하지 않습니다.", '/login');
            }

            exit;
        }

        static function logout() {
            unset($_SESSION['user']);
            go('로그아웃 되었습니다.', '/');
        }
    }