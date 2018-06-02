<template>

    <div class="panel panel-default">

        <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="notify_css"><span id="notifyType_css" class=""></span></div>

                <form v-on:submit.prevent="saveForm()" class="form-horizontal editprofile">

            <div class="">
                <div class="form-group">
                    <label class="col-md-4 control-label" >{{trans('editprofile.Name')}}</label>

                    <div class="col-md-8">
                    <input type="text" v-model="profile.name" class="form-control" >
                    </div>
                </div>

            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{trans('editprofile.Username')}}</label>

                    <div class="col-md-8">

                        <input type="text" v-model="profile.username" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{trans('editprofile.Email')}}</label>

                    <div class="col-md-8">

                        <input type="text" v-model="profile.email" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{trans('editprofile.Phone number')}}</label>

                    <div class="col-md-8">
                        <input type="text" v-model="profile.phone" class="form-control">


                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{ trans('word.Your Gender')}}</label>

                    <div class="col-md-4">
                        <select v-model="profile.gender" >
                       <!--<select v-model="profile.gender" >-->
                            <option value="Male"  >Male</option>
                            <option value="Female"  >Female</option>
                        <!--</select>-->
                        </select>
                    </div>
                </div>

            </div>
                    <div class="">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">{{ trans('word.Your Lang')}}</label>

                            <div class="col-md-4">
                                <select v-model="profile.lang_id" >
                                    <!--<select v-model="profile.gender" >-->
                                    <option value="1"  >عربي</option>
                                    <option value="2"  >English</option>
                                    <!--</select>-->
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="">
                        <div class="form-group">
                            <label  class="col-md-4 control-label">{{ trans('word.Your Birthday')}}</label>


                            <div class="col-md-4">
                                <!--<input class="form-control"  v-model="profile.birthday" />-->
                                <vue-date v-model="profile.birthday"></vue-date>
                                <!--<input class="form-control" id="startDate"  type="date" />-->
                            </div>
                        </div>

                    </div>

                    <div class="">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button class="btn btn-primary">
                            {{trans('editprofile.Save Changes')}}
                        </button>


                    </div>
                </div>
            </div>



        </form>

    </div>
        </div>

</template>

<script>
    export default {
        mounted() {
            let app = this;
            // let id = app.$route.params.id;
           // alert(id);
            axios.get('/editPersonal')
                .then(function (resp) {
                    app.profile = resp.data;
                    // alert(resp.data.nickname);
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load your profile")
                });

        },
        data: function () {
            return {
                id: null,
                profile: {
                    name: '',
                    username: '',
                    email: '',
                    gender:'',
                    phone: '',
                    lang_id:'',
                    birthday:'',

                }
            }

        },
        methods: {
            saveForm() {
                var app = this;
                var newProfile = app.profile;
                axios.patch('/updatePersonal', newProfile)
                    .then(function (resp) {
                        $(".notify_css").toggleClass("active_css");
                        $("#notifyType_css").toggleClass("success_css");

                        setTimeout(function(){
                            $(".notify_css").removeClass("active_css");
                            $("#notifyType_css").removeClass("success_css");
                        },2000);
                        // app.$router.replace('/api/v1/companies/' + app.companyId);
                       // alert("Saved");
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        // alert("Could not create your Profile");
                            $(".notify_css").addClass("active_css");
                            $("#notifyType_css").addClass("failure_css");

                            setTimeout(function(){
                                $(".notify_css").removeClass("active_css");
                                $("#notifyType_css").removeClass("failure_css");
                            },2000);
                    });
            }
        }

    }



</script>

<style scoped>

</style>