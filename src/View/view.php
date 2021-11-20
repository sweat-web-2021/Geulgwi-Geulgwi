    <div class="row" id="view">
        <div class="header col-2">
            <div class="logo">
                <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
            </div>
            <div class="profile">
                <img src="./resource/img/profile.png" alt="">
                <span style="margin-top:15px;"><?= $_SESSION['user']->id ?></span>
            </div>
        </div>
        <div class="content col-8" stlye="padding-right: 0;">
            <div class="top">
                <span class="writer_info">
                    <img src="./resource/img/profile.png" alt="">
                    <span><?= $list->writer ?></span>
                </span>
                <i style="font-size:24px;" class="fas fa-list-ul"></i>
            </div>
            <div class="mid">
                <span class="collon">“</span>
                <p class="main_content"><b><?= $list->content ?></b></p>
                <span class="people"><?= $list->copy ?></span>
                <span class="collon">”</span>
            </div>
            <div class="bot">
                <div class="btns">
                    <?php if($list->user_id == null) : ?>
                        <button data-id="<?= $list->id ?>" class="goodbtn likebtn"><i style="font-size:24px;" class="far fa-star"></i></button>
                    <?php else : ?>
                        <button data-id="<?= $list->id ?>" class="goodbtn unlikebtn"><i style="font-size:24px;" class="fas fa-star"></i></button>
                    <?php endif; ?>
                    <p style="margin:0;"><?= $list->sug ?></p>
                </div>

                <?php if($list->u_id == null) : ?>
                    <button data-id="<?= $list->id ?>" class="savebtn"><i style="font-size:24px;" class="far fa-bookmark"></i></button>
                <?php else : ?>
                    <button data-id="<?= $list->id ?>" class="unsavebtn"><i style="font-size:24px;" class="fas fa-bookmark"></i></button>
                <?php endif; ?>
            </div>
        </div>
        <div class="review col-2">
            <div class="top">
                <?php foreach($list1 as $item) : ?>
                    <div class="item">
                        <img src="./resource/img/profile.png" alt="">
                        <span><?= $item->text ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
            <form class="bot">
                <i style="font-size:24px; margin-right:10px;" class="far fa-smile"></i>
                <input class="form-control" name="text" type="text" placeholder="댓글 달기..." required>
                <input type="hidden" name="code" value="<?= $list->id ?>">
                <button class="reviewup">게시</button>
            </form>
        </div>
    </div>
    <script src="./resource/js/view.js"></script>