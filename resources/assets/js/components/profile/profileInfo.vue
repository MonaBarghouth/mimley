<template>

    <div class="panel panel-default">

        <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="notify_css"><span id="notifyType_css" class=""></span></div>

                <form v-on:submit.prevent="saveForm()" class="form-horizontal editprofile">

            <div class="">
                <div class="form-group">
                    <label class="col-md-4 control-label" >{{ trans('editprofile.Nick-name') }}</label>

                    <div class="col-md-8">
                    <input type="text" v-model="profile.nickname" class="form-control" >
                    <input type="hidden" v-model="profile.user_id" class="form-control" >
                    </div>
                </div>

            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{ trans('editprofile.work') }}</label>

                    <div class="col-md-8">

                        <input type="text" v-model="profile.work" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{ trans('editprofile.lacation') }}</label>

                    <div class="col-md-8">

                        <input type="text" v-model="profile.lacation" class="form-control">

                    </div>
                </div>
            </div>
            <div class="">
                <div class="form-group">
                    <label  class="col-md-4 control-label">{{ trans('editprofile.Bio') }}</label>

                    <div class="col-md-8">
                        <textarea rows="3"  class="form-control"  v-model="profile.bio"></textarea>


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
    // export default {
    //     name: "profileInfo.veu"
    // }
    //
    // Vue.http.interceptors.push((request, next) => {
    //     request.headers.set('X-CSRF-TOKEN', '{{ csrf_token() }}')
    //     next()
    // })
    export default {
        mounted() {
            let app = this;
            // let id = app.$route.params.id;
            // app.companyId = import transFilter from 'vue-trans';
            axios.get('/editProfile1')
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
                user_id: null,
                profile: {
                    nickname: '',
                    work: '',
                    lacation: '',
                    bio: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newProfile = app.profile;
                axios.patch('/updateProfile', newProfile)
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