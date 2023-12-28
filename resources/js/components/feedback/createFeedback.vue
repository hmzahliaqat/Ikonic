<!--
    This file contain form for submission of feedbacks
 -->
<template>

</template>

<script>


export default {

    data() {
        return {
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        error:{},

        'feedback':{
            'name':'',
            'discription':'',
            'category':'',
        },
        }
    },


    methods: {
        create() {
        axios.post('/create',this.feedback).then(res=>{
            this.fetch();


        }).catch(error=>{
            this.error= error?.response?.data?.errors;
            console.log(error);
        })
        }
    },

    mounted() {
        console.log('Component mounted.')
    }
}
</script>
