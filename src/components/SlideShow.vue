<template>
  <div class="container">
    <div>
      <h5>Create Your Own Title</h5>
      <div :class="'jumbotron p-3 p-md-5 rounded ol-md-6 px-0 ' + (fadeInAction ? 'fade-in' : '')" v-html="content" ref="slideContent">
      </div>
    </div>
    <button class="btn btn-primary" @click="prev"><i class="fas fa-angle-left"></i></button> {{index + 1}} of {{total}}  <button class="btn btn-primary" @click="next"><i class="fas fa-angle-right"></i></button>
     <div class="text-center">(You can click Left/Right arrow buttons to navigate)</div>
  </div>
  </template>

<script>
import config from '@/config/slideshow.html';
import hljs from 'highlightjs';
import {getProgressPageIndex, setProgressPageIndex} from '@/lib/localstorage';


export default {
  name: 'SlideShow',
  props: {
    msg: String
  },
  data() {
      return {
          total: 0,
          index: 0,
          content: null,
          fadeInAction: false,
      }
  },
  created() {
      this.total = config.length;
      this.index = getProgressPageIndex();
      this.content = config[this.index];
  },
  mounted() {
      document.addEventListener('keydown', (event) => {
          switch(event.keyCode) {
              case 37:
                  this.prev();
                  break;
              case 39:
                  this.next();
                  break;
              default:
                  break;
          }
      });
    this.initCode();
  },
  methods: {
      initCode() {
          this.$refs.slideContent.querySelectorAll('pre code').forEach((block) => {
              hljs.highlightBlock(block);
          });
      },
      next() {
          if (this.index === this.total - 1) {
              return;
          }
          this.index ++;
          this._goPage();
      },
      prev() {
          if (this.index === 0) {
              return;
          }
          this.index --;
          this._goPage();
      },
      _goPage() {
          this.fadeInAction = true;
          setProgressPageIndex(this.index);
          this.content = config[this.index];
          this.$nextTick(() => {
              this.initCode();
          });
          setTimeout(() => {
              this.fadeInAction = false;
          }, 900);
      }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
.jumbotron {
  text-align: left;
  height: 600px;
  overflow-y: scroll;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.fade-in {
    animation: fadein 1.5s;
    -moz-animation: fadein 1.5s; /* Firefox */
    -webkit-animation: fadein 1.5s; /* Safari and Chrome */
    -o-animation: fadein 1.5s; /* Opera */
}
@keyframes fadein {
    from {
        opacity:0.6;
    }
    to {
        opacity:1;
    }
}
.bg-green {
    background-color: #71dd8a;
    color: white;
}
.bigger-font {
    font-size: 150%;
}
</style>
