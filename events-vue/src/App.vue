<template>
  <div id="app">
    <div class="row">
      <ul class="main" style="text-align:center;">
        <li>
          <a href="#" v-on:click="selected='0'">All Events</a>
        </li>
        <li>
          <a href="#" v-on:click="selected='1'">Live Events</a>
        </li>
        <li>
          <a href="#" v-on:click="selected='2'">Upcoming Events</a>
        </li>
        <li>
          <a href="#" v-on:click="selected='3'">Past Events</a>
        </li>
      </ul>
      <br>
      <br>
      <br>
      <br>
      <div
        v-if="(event.type==selected)||(selected=='0')"
        v-bind:key="event.id"
        v-for="event in events"
        class="col-1-of-3"
      >
        <div class="card">
          <div class="card__side card__side--front">
            <div
              class="card__picture card__picture--1"
              v-bind:style="{'background-image':'url(' + event.poster+ ')'}"
            >&nbsp;</div>

            <h4 class="card__heading">
              <span
                v-bind:class="['card__heading-span','card__heading-span--'+event.id%3]"
              >{{event.name}}</span>
            </h4>
            <div class="card__details">
              <ul>
                <br>
                <li>{{event.date}}</li>
                <li>{{event.time}}</li>
                <li>Prerequisite :{{event.prerequisite}}</li>
                <li>Reg. Fee :{{event.fee}}</li>
              </ul>
            </div>
          </div>
          <div v-bind:class="['card__side card__side--back','card__side--back-'+event.id%3]">
            <div class="card__cta">
              <div class="card__price-box">
                <p class="card__price-only">{{event.name}}</p>
                <p class="card__price-value">{{event.description}}</p>
              </div>
              <a
                v-if="event.status=='1'"
                v-bind:href="event.link"
                class="btn btn--white"
              >Register Now</a>
              <a v-else-if="event.status=='0'" href="#" class="btn btn--white">Registration Closed</a>
              <a v-else-if="event.status=='2'" href="#" class="btn btn--white">Coming Soon</a>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
      </div>
    </div>
  </div>
</template>

<script>
import $ from 'jquery'
export default {
  name: 'app',
  data()
  {
    return {
      selected: "0",
      events: []
    }
  },
  mounted: function ()  {
    var self = this;
    $.ajax({
      url: 'http://linuxloves.com/fossevents.php',
      method: 'GET',
      success: function (data)      {
        self.events = data;
      },
      error: function (error)      {
        console.log(error);
      }
    });
  }
}
</script>

<style>
*,
*::after,
*::before {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

html {
  font-size: 65%;
}

body {
  box-sizing: border-box;
}

@keyframes moveInLeft {
  0% {
    opacity: 0;
    transform: translateX(-10rem);
  }
  80% {
    transform: translateX(1rem);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

@keyframes moveInRight {
  0% {
    opacity: 0;
    transform: translateX(10rem);
  }
  80% {
    transform: translateX(-1rem);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

@keyframes moveInBottom {
  0% {
    opacity: 0;
    transform: translateY(3rem);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}

body {
  font-family: "Lato", sans-serif;
  font-weight: 400;
  line-height: 1.7;
  color: #777;
  padding: 3rem;
}

.heading-primary {
  color: #fff;
  text-transform: uppercase;
  backface-visibility: hidden;
  margin-bottom: 6rem;
}
.heading-primary--main {
  display: block;
  font-size: 6rem;
  font-weight: 400;
  letter-spacing: 3.5rem;
  animation: moveInLeft 1s;
}
.heading-primary--sub {
  display: block;
  font-size: 2rem;
  font-weight: 700;
  letter-spacing: 1.8rem;
  animation: moveInRight 1s;
}

.main li {
  font-size: 25px;
  font-weight: 650;
  display: inline-block;
  padding-right: 50px;
}

.main li a:link,
.main li a:visited {
  color: #000000;
  text-decoration: none;
  text-transform: uppercase;
  border-bottom: 2px solid transparent;
  transition: border-bottom 0.2s;
}

.main li a:hover,
.main li a:active {
  color: #000000;
  text-decoration: none;
  text-transform: uppercase;
  border-bottom: 3px solid #ff0000;
}

.heading-tertiary {
  font-size: 1.6rem;
  font-weight: 700;
  text-transform: uppercase;
}

.paragraph {
  font-size: 1.6rem;
}
.paragraph:not(:last-child) {
  margin-bottom: 3rem;
}

.u-center-text {
  text-align: center;
}

.u-mb-lg {
  margin-bottom: 8rem;
}

.u-mb-md {
  margin-bottom: 4rem;
}

.u-mb-sm {
  margin-bottom: 1.5rem;
}

.u-mt-lg {
  margin-top: 8rem;
}

.u-mt-xl {
  margin-top: 10rem;
}

.btn:link,
.btn:visited {
  text-transform: uppercase;
  text-decoration: none;
  padding: 1.5rem 4rem;
  display: inline-block;
  border-radius: 10rem;
  transition: all 0.2s;
  position: relative;
  font-size: 1.6rem;
}

.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.2);
}
.btn:hover::after {
  transform: scaleX(1.4) scaleY(1.6);
  opacity: 0;
}

.btn:active {
  transform: translateY(-1px);
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
}

.btn--white {
  background: #fff;
  color: #777;
}
.btn--white::after {
  background: #fff;
}

.btn--green {
  background: #55c57a;
  color: #fff;
}
.btn--green::after {
  background: #55c57a;
}

.btn::after {
  content: "";
  display: inline-block;
  height: 100%;
  width: 100%;
  border-radius: 10rem;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all 0.4s;
}

.btn--animated {
  animation: moveInBottom 1s ease-out 0.75s backwards;
}

.btn-text:link,
.btn-text:visited {
  color: #55c57a;
  display: inline-block;
  text-decoration: none;
  border-bottom: 1px solid #55c57a;
  padding: 3px;
  font-size: 1.6rem;
}

.btn-text:hover {
  background-color: #55c57a;
  color: #fff;
  box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.15);
  transform: translateY(-2px);
  transition: all 0.2s;
}

.btn-text:active {
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  transform: translateY(0);
}

.card {
  perspective: 150rem;
  -moz-perspective: 150rem;
  position: relative;
  height: 52rem;
}
.card__side {
  border-color: #777;
  height: 52rem;
  transition: all 0.8s ease;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  backface-visibility: hidden;
  border-radius: 3px;
  overflow: hidden;
  box-shadow: 0 2rem 2rem rgba(0, 0, 0, 0.15);
}
.card__side--front {
  background-color: #fff;
}
.card__side--back {
  background-color: green;
  transform: rotateY(180deg);
}
.card__side--back-0 {
  background-image: linear-gradient(to right bottom, #ffb900, #ff7730);
}
.card__side--back-1 {
  background-image: linear-gradient(to right bottom, #7ed56f, #28b485);
}
.card__side--back-2 {
  background-image: linear-gradient(to right bottom, #2998ff, #5643fa);
}
.card:hover .card__side--front {
  transform: rotateY(-180deg);
}
.card:hover .card__side--back {
  transform: rotateY(0);
}
.card__picture {
  background-size: cover;
  height: 23rem;
  background-blend-mode: screen;
  -webkit-clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
  clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.card__picture--1 {
  background-image: linear-gradient(to right bottom, #ffb900, #ff7730);
}
.card__picture--2 {
  background-image: linear-gradient(to right bottom, #7ed56f, #28b485);
}
.card__picture--3 {
  background-image: linear-gradient(to right bottom, #2998ff, #5643fa);
}
.card__heading {
  font-size: 2.8rem;
  font-weight: 300;
  text-align: right;
  text-transform: uppercase;
  color: #fff;
  position: absolute;
  top: 12rem;
  right: 2rem;
  width: 75%;
}
.card__heading-span {
  padding: 1rem 1.5rem;
  -webkit-box-decoration-break: clone;
  box-decoration-break: clone;
}
.card__heading-span--0 {
  background-image: linear-gradient(
    to right bottom,
    rgba(255, 185, 0, 0.85),
    rgba(255, 119, 48, 0.85)
  );
}
.card__heading-span--1 {
  background-image: linear-gradient(
    to right bottom,
    rgba(126, 213, 111, 0.85),
    rgba(40, 180, 133, 0.85)
  );
}
.card__heading-span--2 {
  background-image: linear-gradient(
    to right bottom,
    rgba(41, 152, 255, 0.85),
    rgba(86, 67, 250, 0.85)
  );
}
.card__details {
  padding: 3rem;
}
.card__details ul {
  list-style: none;
  width: 80%;
  margin: 0 auto;
}
.card__details ul li {
  text-align: center;
  font-size: 1.5rem;
  padding: 1rem;
}
.card__details ul li:not(:last-child) {
  border-bottom: 1px solid #eee;
}
.card__cta {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  text-align: center;
}
.card__price-box {
  margin-bottom: 8rem;
  color: #fff;
}
.card__price-only {
  font-size: 2.5rem;
  text-transform: uppercase;
  font-weight: 100;
}
.card__price-value {
  font-size: 1.7rem;
}

.composition {
  position: relative;
}
.composition__photo {
  width: 55%;
  box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.4);
  border-radius: 2px;
  position: absolute;
  z-index: 1;
  transition: all 0.2s;
  outline-offset: 2rem;
}
.composition__photo--p1 {
  left: 0;
  top: -2rem;
}
.composition__photo--p2 {
  right: 0;
  top: 2rem;
}
.composition__photo--p3 {
  left: 20%;
  top: 10rem;
}
.composition__photo:hover {
  outline: 1.5rem solid #55c57a;
  transform: scale(1.05) translateY(-0.5rem);
  box-shadow: 0 2.5rem 4rem rgba(0, 0, 0, 0.4);
  z-index: 2;
}
.composition:hover .composition__photo:not(:hover) {
  transform: scale(0.95);
}

.feature-box {
  background-color: rgba(255, 255, 255, 0.8);
  font-size: 1.5rem;
  padding: 2.5rem;
  text-align: center;
  border-radius: 3px;
  box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.15);
  transition: transform 0.3s;
}
.feature-box__icon {
  font-size: 6rem;
  margin-bottom: 0.5rem;
  background-image: linear-gradient(to right, #7ed56f, #28b485);
  -webkit-background-clip: text;
  color: transparent;
}
.feature-box:hover {
  transform: translateY(-1.5rem) scale(1.03);
}

.row {
  max-width: 114rem;
  margin: 0 auto;
}
.row::after {
  content: "";
  display: table;
  clear: both;
}
.row:not(:last-child) {
  margin-bottom: 8rem;
}
.row [class^="col-"] {
  float: left;
}
.row [class^="col-"]:not(:last-child) {
  margin-right: 6rem;
}
.row .col-1-of-2 {
  width: calc((100% - 6rem) / 2);
}
.col-1-of-3 {
  width: calc((100% - 2 * 6rem) / 3);
}
@media only screen and (max-width: 768px) {
  [class*="col-1-of-3"] {
    width: 94%;
    margin-left: 3%;
    margin-bottom: 4%;
  }
}
</style>
