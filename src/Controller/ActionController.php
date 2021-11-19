<?php
    namespace Controller;
    use App\DB;
    class ActionController {
        static function writeok() {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $writer = $_SESSION['user']->id;

            DB::query("INSERT INTO list (title, content, writer) VALUES (?, ?, ?)", [$title, $content, $writer]);
            go("작성완료", '/list');
        }

        static function register() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $passchk = $_POST['passchk'];
            $passHint = $_POST['passHint'];
            $cate = $_POST['cate'];
            $cate = join(',', $cate);

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

        static function chklike() {
            $code = $_POST['code'];

            DB::query("INSERT INTO liketable (user_id, code) VALUES (?, ?)", [$_SESSION['user']->id, $code]);
            DB::query("UPDATE list SET sug = sug + 1 WHERE id = ?", [$code]);
        }

        static function unlike() {
            $code = $_POST['code'];

            DB::query("DELETE FROM liketable WHERE code = ? AND user_id = ?", [$code, $_SESSION['user']->id]);
            DB::query("UPDATE list SET sug = sug - 1 WHERE id = ?", [$code]);
        }

        static function save() {
            $code = $_POST['code'];
            DB::query("INSERT INTO savetable (user_id, code) VALUES (?, ?)", [$_SESSION['user']->id, $code]);
        }

        static function unsave() {
            $code = $_POST['code'];
            DB::query("DELETE FROM savetable WHERE user_id = ? AND code = ?", [$_SESSION['user']->id, $code]);
        }

        static function review() {
            $text = $_POST['text'];
            $code = $_POST['code'];

            DB::query("INSERT INTO review (user_id, text, code) VALUES (?, ?, ?)", [$_SESSION['user']->id, $text, $code]);
            $list = DB::fetchAll("SELECT * FROM review WHERE code = ?", [$code]);

            echo json_encode($list);
        }
    }