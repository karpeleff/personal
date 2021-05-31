<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Форма обратной связи</div>

                    <div class="card-body">
                       <input v-model="name" >
                        <br>
                        <br>
                        <input v-model="phone" >
                        <br>
                        <br>
                        <textarea>{{text}}</textarea>
                        <br>
                        <br>
                        <button>send</button>



                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    module.exports = {
        data: function() {
            return {
              name  : '',
                phone: '',
                text: ''

            };
        }
    },

    computed: {
        formData(){
            return {
                name:this.name,
                phone:this.phone
            }
        }
    },

    methods: {
        createAdministrator: function() {
            this.$http.post('/feedback_save', this.formData).then(function(response) {
                console.log(response);
            }, function() {
                console.log('failed');
            });
        }
    }

s
</script>

<style scoped>

</style>