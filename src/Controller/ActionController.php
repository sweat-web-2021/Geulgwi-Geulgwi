<?php
    namespace Controller;
    use App\DB;
    class ActionController {
        static function writeok() {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $writer = $_SESSION['user']->id;
            $copy = $_POST['copy'];
            $cate = $_POST['cates'];
            $tag = isset($_POST['tag']) ? $_POST['tag'] : '';

            DB::query("INSERT INTO list (title, content, copy, cate, tag, writer) VALUES (?, ?, ?, ?, ?, ?)", [$title, $content, $copy, $cate, $tag, $writer]);
            go("작성완료", '/list');
        }

        static function register() {
            $id = $_POST['id'];
            $pass = $_POST['pass'];
            $passchk = $_POST['passchk'];

            $img = isset($_FILES['profile']) ? $_FILES['profile']['tmp_name'] : false;

            $regPass = '/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,16}$/';

            $idchk = DB::fetch("SELECT * FROM user WHERE id = ?", [$id]);

            if($idchk) {
                go("존재하는 아이디입니다", '/register');
            } elseif ($pass != $passchk || !preg_match($regPass, $pass)) {
                go("입력하신 정보를 확인해주세요", '/register');
            } elseif($img) {
                $fileTypeExt = explode("/", $_FILES['profile']['type']);
                $fileType = $fileTypeExt[0];
                $fileExt = $fileTypeExt[1];
                $extStatus = false;

                switch($fileExt) {
                    case 'jpeg':
                    case 'jpg':
                    case 'png':
                        $extStatus = true;
                        break;
                    default:
                        go("이미지 파일만 사용할 수 있습니다.", "/");
                        exit;
                }

                if($fileType == 'image') {
                    if($extStatus) {
                        $imgname = time().$_FILES['profile']['name'];
                        $resFile = "./profile/".$imgname;

                        move_uploaded_file($img, $resFile);
                        
                        DB::query("INSERT INTO user (id, pass, profile) VALUES (?, ?, ?)", [$id, $pass, $imgname]);
                        go("회원가입 되셨습니다", '/');
                    } else {
                        go("이미지 파일이 아닙니다.", "/");
                        exit;
                    }
                }
            } else {
                DB::query("INSERT INTO user (id, pass) VALUES (?, ?)", [$id, $pass]);
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
                back("아이디 또는 비밀번호가 일치하지 않습니다.");
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
            DB::query("UPDATE list SET recnt = recnt + 1 WHERE id = ?", [$code]);
            $list = DB::fetchAll("SELECT * FROM
                                  (SELECT * FROM review WHERE code = ?) AS r
                                  LEFT JOIN user AS u ON r.user_id = u.id", [$code]);

            echo json_encode($list);
        }

        static function editok() {
            $id = $_POST['id'];
            $cate = $_POST['cates'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $copy = $_POST['copy'];
            $tag = isset($_POST['tag']) ? $_POST['tag'] : '';

            DB::query("UPDATE list SET title = ?, content = ?, copy = ?, cate = ?, tag = ? WHERE id = ?", [$title, $content, $copy, $cate, $tag, $id]);

            go("수정 완료", '/view?id='.$id);
        }

        static function del() {
            $code = $_POST['code'];

            DB::query("DELETE FROM list WHERE id = ?", [$code]);
        }

        static function searchreq() {
            $type = $_POST['type'];
            $key = $_POST['keyword'] == "전체" ? '' : $_POST['keyword'];
            $start = $_POST['start'];
            $list;

            switch ($type) {
                case '제목':
                    $list = DB::fetchAll("SELECT * FROM list WHERE title LIKE '%".$key."%' ORDER BY id DESC LIMIT ".$start.", 10");
                    break;

                case '닉네임':
                    $list = DB::fetchAll("SELECT * FROM list WHERE writer LIKE '%".$key."%' ORDER BY id DESC LIMIT ".$start.", 10");
                    break;
                
                case '카테고리':
                    $list = DB::fetchAll("SELECT * FROM list WHERE cate LIKE '%".$key."%' ORDER BY id DESC LIMIT ".$start.", 10");
                    break;

                case '태그':
                    $list = DB::fetchAll("SELECT * FROM list WHERE tag LIKE '%".$key."%' ORDER BY id DESC LIMIT ".$start.", 10");
                    break;
            }

            echo json_encode($list);
        }

        static function profileup() {
            $pass = strlen($_POST['pass']) > 0 ? $_POST['pass'] : $_SESSION['user']->pass;
            $passchk = strlen($_POST['passchk']) > 0 && strlen($_POST['pass']) > 0 ? $_POST['passchk'] : $_SESSION['user']->pass;

            $img = isset($_FILES['profile']) ? $_FILES['profile']['tmp_name'] : false;

            $regPass = '/^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,16}$/';

            $idchk = DB::fetch("SELECT * FROM user WHERE id = ?", [$id]);

            if ($pass != $passchk || !preg_match($regPass, $pass)) {
                go("입력하신 정보를 확인해주세요", '/mypage');
            } elseif($img) {
                $fileTypeExt = explode("/", $_FILES['profile']['type']);
                $fileType = $fileTypeExt[0];
                $fileExt = $fileTypeExt[1];
                $extStatus = false;

                switch($fileExt) {
                    case 'jpeg':
                    case 'jpg':
                    case 'png':
                        $extStatus = true;
                        break;
                    default:
                        go("이미지 파일만 사용할 수 있습니다.", "/");
                        exit;
                }

                if($fileType == 'image') {
                    if($extStatus) {
                        unlink("./profile/".$_SESSION['user']->profile);
                        $imgname = time().$_FILES['profile']['name'];
                        $resFile = "./profile/".$imgname;

                        move_uploaded_file($img, $resFile);
                        
                        DB::query("UPDATE user SET pass = ?, profile = ? WHERE id = ?", [$pass, $imgname, $_SESSION['user']->id]);
                        $_SESSION['user'] = DB::fetch("SELECT * FROM user WHERE id = ? AND pass = ?", [$_SESSION['user']->id, $pass]);
                        go("회원정보 수정 완료", '/mypage');
                    } else {
                        go("이미지 파일이 아닙니다.", "/");
                        exit;
                    }
                }
            } else {
                DB::query("UPDATE user SET pass = ? WHERE id = ?", [$pass, $_SESSION['user']->id]);
                $_SESSION['user'] = DB::fetch("SELECT * FROM user WHERE id = ? AND pass = ?", [$_SESSION['user']->id, $pass]);
                go("회원정보 수정 완료", '/mypage');
            }
            exit;
        }
    }