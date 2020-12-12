<template>
    <div class="card my-3">
        <div class="card-header d-flex justify-content-between">
            <span>id: {{ id }}</span>
            <span>{{ created_at }}</span>
            <span>{{ updated_at }}</span>
        </div>
        <div class="card-body">
            {{ preview }}
        </div>
       <div class="card-footer" v-if="meta">
           <div v-if="meta['og:url']">
               <div>
                   <a :href="meta['og:url']" v-text="meta['og:url']"></a>
               </div>
               <div v-if="meta['og:image']">
                   <a :href="meta['og:url']">
                       <img :src="meta['og:image']" alt="image link">
                   </a>
               </div>
               <div v-text="meta['og:description']">

               </div>
           </div>
           <!--
           <pre>{{ meta }}</pre>
            -->
       </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'Post',

        props: [
            'id',
            'preview',
            'content',
            'meta',
            'created_at',
            'updated_at',
        ],

        components: {

        },

        mounted() {
            this.checkRegexUrl()
        },

        data() {
            return {

            }
        },

        methods: {
            async checkRegexUrl() {
                let expression = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)?/gi;
                let regex = new RegExp(expression);

                if( ! this.preview.match(regex) ) {
                    return
                }
                const url = this.preview.match(regex)[0]


                const response = await axios.get(url, { crossdomain: true })
                return await console.log(response)
              //  const data = await response.data
                //console.log(data)

            }
        }
    }
</script>
