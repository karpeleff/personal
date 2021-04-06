<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Resume</div>

                    <div class="card-body">
                        <p>Добро пожаловать на мою страничку!</p>
                        <p>Меня  зовут Алексей , и я начинающий вебразработчик , (хочется так думать) )</p>
                        <p>В силу разных причин тестовые задания на hh.ru я благополучно продалбываю по времени ,
                        поэтому решил выложить здесь некоторые мои наработки , для ознакомления.</p>
                        <p>Сама эта страничка это модифицированный дефолтный компонент Vue.js,
                            собранный с помощью  Laravel  Mix </p>
                        <p>Мои предпочтения направлены в сторону бекенда ,  поэтому выбрал laravel в качестве фреймворка для изучения.</p>
                        <p><a href="https://github.com/karpeleff/karpelev.com.git"   target="blank">ссылка на проект  на Github</a></p>


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
