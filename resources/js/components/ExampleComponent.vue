<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Resume</div>

                    <div class="card-body">
                        <p>Добро пожаловать на мою страничку!</p>
                        <p>Меня  зовут Алексей , и я начинающий вебразработчик , с небольшим  практическим опытом )</p>
                        <p>Здесь выложил примеры моего кода для ознакомления</p>
                        <p>Сама эта страничка это модифицированный дефолтный компонент Vue.js,
                            собранный с помощью  Laravel  Mix </p>
                        <p>Мои предпочтения направлены в сторону бекенда ,  поэтому выбрал laravel в качестве фреймворка для изучения.</p>
                        <p><a href="https://github.com/karpeleff/karpelev.com.git"   target="blank">ссылка на проект  на Github</a></p>
                        <p><a href="https://github.com/karpeleff/karpelev.com/blob/master/app/source/db.php"   target="blank">Класс PDO  для работы с БД Mysql</a></p>
                        <p><a href="https://github.com/karpeleff/homework/blob/master/controllers/EngineController.php"   target="blank">Ну и немного Yii2 ) </a></p>
                        <p><a href="https://github.com/karpeleff/php_tz/blob/master/yii-application/backend/controllers/AppleController.php"   target="blank">еще  ТЗ Yii2  </a></p>


                        <p>Мои контакты </p>

                        <a href="tel:+79020648016"><p> тел 8 902 064 80 16</p></a>
                        <p><a href="mailto:alekseykarpelev@gmail.com">alekseykarpelev@gmail.com</a></p>





                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
