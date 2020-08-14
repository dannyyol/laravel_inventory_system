<template>
    
    <div>

    <!-- Login Content -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div class="card shadow-sm my-5">
                <div class="card-body p-0">
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="login-form">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        <form class="user" @submit.prevent="login">
                            <div class="form-group">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                placeholder="Enter Email Address" v-model="form.email">
                                <small class="text-danger" v-if="errors.email"> {{ errors.email[0] }} </small>        
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password" v-model="form.password">
                                <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>

                            </div>
                            <div class="form-group">
                            <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                            </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login </button>
                            </div>
                            <hr>
                            <a href="" class="btn btn-google btn-block">
                            <i class="fab fa-google fa-fw"></i> Login with Google
                            </a>
                            <a href="" class="btn btn-facebook btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <router-link class="font-weight-bold small" to="/register">Create an Account!</router-link>
                        </div>

                        <div class="text-center">
                            <router-link class="font-weight-bold small" to="/forget">Forgot Password ?</router-link>
                        </div>
                        <div class="text-center">
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // Waiting for the callback.blade.php message... (token and username).
    mounted () {
        window.addEventListener('message', this.onMessage, false)
    },

    beforeDestroy () {
        window.removeEventListener('message', this.onMessage)
    },

    data(){
        return {
        form:{
            email: null,
            password: null
        },
        errors:{}
        }
    }, 
    methods:{
        login(){
            axios.post('/api/auth/login',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                Toast.fire({
                icon: 'success',
                title: 'Signed in successfully'
                })
                this.$router.push({ name: 'home'})
            })

            .catch(error =>this.errors = error.response.data.errors)
            .catch(
                Toast.fire({
                icon: 'warning',
                title: 'Invalid Email or Password'
            }))
        },


        // This method call the function to launch the popup and makes the request to the controller. 
        loginGoogle () {
            const newWindow = openWindow('', 'message')
            axios.post('api/login-google')
                .then(response => {
                    newWindow.location.href = response.data;
                })
                .catch(function (error) {
                    console.error(error);
                });
            },
            // This method save the new token and username
            onMessage (e) {
            if (e.origin !== window.origin || !e.data.token) {
                return
            }
            localStorage.setItem('user',e.data.name)
            localStorage.setItem('jwt',e.data.token)

            this.$router.go('/board')
            }
        
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name: 'home'});
        }
    }
}

function openWindow (url, title, options = {}) {
      if (typeof url === 'object') {
        options = url
        url = ''
      }

      options = { url, title, width: 600, height: 720, ...options }

      const dualScreenLeft = window.screenLeft !== undefined ? window.screenLeft : window.screen.left
      const dualScreenTop = window.screenTop !== undefined ? window.screenTop : window.screen.top
      const width = window.innerWidth || document.documentElement.clientWidth || window.screen.width
      const height = window.innerHeight || document.documentElement.clientHeight || window.screen.height

      options.left = ((width / 2) - (options.width / 2)) + dualScreenLeft
      options.top = ((height / 2) - (options.height / 2)) + dualScreenTop

      const optionsStr = Object.keys(options).reduce((acc, key) => {
        acc.push(`${key}=${options[key]}`)
        return acc
      }, []).join(',')

      const newWindow = window.open(url, title, optionsStr)

      if (window.focus) {
        newWindow.focus()
      }

      return newWindow
    }

</script>