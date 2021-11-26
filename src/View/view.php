    <input type="hidden" name="id" class="codes" value="<?= $list->id ?>">
    <div class="row" id="view">
        <div class="header col-2">
            <div class="logo">
                <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
            </div>
            <?php if(isset($_SESSION['user'])) : ?>
                <div class="profile">
                    <img src="./profile/<?= $_SESSION['user']->profile ?>" alt="">
                    <span style="margin-top:15px;"><?= $_SESSION['user']->id ?></span>
                </div>
            <?php endif; ?>
        </div>
        <div class="content col-8" stlye="padding-right: 0;">
            <div class="top">
                <span class="writer_info">
                    <img src="./profile/<?= $list->wpro ?>" alt="">
                    <span><?= $list->writer ?></span>
                </span>
                <?php if(isset($_SESSION['user']) && $_SESSION['user']->id == $list->writer) : ?>
                    <div class="de">
                        <button class="btn btn-danger delete">삭제</button>
                        <a href="/edit?id=<?= $list->id ?>" class="btn btn-secondary edit">수정</a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mid">
                <p class="main_content"><b><?= $list->content ?></b></p>
                <span class="people">-<?= $list->copy ?>-</span>
            </div>
            <div class="bot">
                <div class="btns">
                    <?php if(!isset($_SESSION['user'])) : ?>
                        <i style="font-size:24px; margin-right:10px;" class="fas fa-star"></i>
                    <?php elseif(isset($_SESSION['user']) && $list->user_id == null) : ?>
                        <button class="goodbtn likebtn"><i style="font-size:24px;" class="far fa-star"></i></button>
                    <?php else : ?>
                        <button class="goodbtn unlikebtn"><i style="font-size:24px;" class="fas fa-star"></i></button>
                    <?php endif; ?>
                    <p style="margin:0;"><?= $list->sug ?></p>

                    
                </div>

                <?php if(!isset($_SESSION['user']) || $_SESSION['user']->id == $list->writer) : ?>
                    <i style="font-size:24px; margin-right:10px" class="fas fa-bookmark"></i>
                <?php elseif(isset($_SESSION['user']) && $list->u_id == null) : ?>
                    <button class="savebtn"><i style="font-size:24px;" class="far fa-bookmark"></i></button>
                <?php else : ?>
                    <button class="unsavebtn"><i style="font-size:24px;" class="fas fa-bookmark"></i></button>
                <?php endif; ?>
            </div>
        </div>
        <div class="review col-2">
            <div class="top">
                <?php foreach($list1 as $item) : ?>
                    <div class="item">
                        <img src="./profile/<?= $item->profile ?>" alt="">
                        
                        <div class="wrap">
                            <span style="font-weight:bold;"><?= $item->user_id ?></span>
                            <span style="word-break:break-all;"><?= $item->text ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if(isset($_SESSION['user'])) : ?>
                <form class="bot">
                    <i style="font-size:24px; margin-right:10px;" class="far fa-smile"></i>
                    <input class="form-control reviewtext" name="text" type="text" placeholder="댓글 달기..." required>
                    <button class="reviewup">게시</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <script src="./resource/js/view.js"></script>
</body>
</html>