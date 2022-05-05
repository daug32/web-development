<div id="enroll" class="hide">
    <div class="enroll__container">
        <img src="images/Exit.svg" alt="" class="enroll__exit">
        <img src="images/Welcome.svg" alt="" class="enroll__img">
        <h2 class="enroll__title title">Записаться на курс</h2>

        <form method="POST" action="/enroll" class="enroll__form">
            <input type="text"  name="name" id="name" value="" class="enroll__input" placeholder="Ваше имя" >
            <input type="email" name="email" id="email" value="" class="enroll__input" placeholder="Email">
            
            <select name="profession" id="profession" value="" class="enroll__select" placeholder="Деятельность">
                <option>Программист</option>
                <option>Дизайнер</option>
                <option>Маркетолог</option>
            </select>

            <div class="enroll__labeled-input">
                <input type="checkbox" name="subscribe" id="subscribe" class="enroll__checkbox">
                <label for="subscribe" class="enroll__label text">Согласeн получать информационные материалы о старте курса</label>
            </div>

            <button class="enroll__subscribe-button title">Записаться на курс</button>
        </form>
    </div>
</div>

<link rel="stylesheet" href="/styles/enroll.css">
<script defer src="/scripts/EnrollAnimator.js"> </script>
