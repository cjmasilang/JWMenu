
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" type="image/png" href='images/logo.png'>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
:root {
  --container-bg-color: #333;
  --left-bg-color: rgba(243, 203, 47, 0.8);
  --left-button-hover-color: rgba(161, 11, 11, 0.3);
  --right-bg-color: rgba(43, 43, 43, 0.8);
  --right-button-hover-color: rgba(92, 92, 92, 0.3);
  --hover-width: 75%;
  --other-width: 25%;
  --speed: 1000ms;
}

html, body {
  padding:0;
  margin:0;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
}

h1 {
  font-size: 4rem;
  color: #fff;
  position: absolute;
  left: 50%;
  top: 20%;
  transform: translateX(-50%);
  white-space: nowrap;
}

.button {
  display: block;
  position: absolute;
  left: 50%;
  top: 40%;
  height: 2.5rem;
  padding-top: 1.3rem;
  width: 15rem;
  text-align: center;
  color: #fff;
  border: #fff solid 0.2rem;
  font-size: 1rem;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
  transform: translateX(-50%);
}

.split.left .button:hover {
  background-color: var(--left-button-hover-color);
  border-color: var(--left-button-hover-color);
}

.split.right .button:hover {
  background-color: var(--right-button-hover-color);
  border-color: var(--right-button-hover-color);
}

.container {
  position: relative;
  width: 100%;
  height: 100%;
  background: var(--container-bg-color);
}

.split {
  position: absolute;
  width: 50%;
  height: 100%;
  overflow: hidden;
}

.split.left {
  left:0;
  background: url('images/background.jpg') center center no-repeat;
  background-size: cover;
}

.split.left:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--left-bg-color);
}

.split.right {
  right:0;
  background: url('images/third.jpg') center center no-repeat;
  background-size: cover;
}

.split.right:before {
  position:absolute;
  content: "";
  width: 100%;
  height: 100%;
  background: var(--right-bg-color);
}

.split.left, .split.right, .split.right:before, .split.left:before {
  transition: var(--speed) all ease-in-out;
}

.hover-left .left {
  width: var(--hover-width);
}

.hover-left .right {
  width: var(--other-width);
}

.hover-left .right:before {
  z-index: 2;
}


.hover-right .right {
  width: var(--hover-width);
}

.hover-right .left {
  width: var(--other-width);
}

.hover-right .left:before {
  z-index: 2;
}

@media(max-width: 800px) {
  h1 {
    font-size: 2rem;
  }

  .button {
    width: 12rem;
  }
}

@media(max-height: 700px) {
  .button {
    top: 70%;
  }
}
</style>
</head>
<body>
  
<div class="container">
  <div class="split left">
    <h1>James Wright Cafe</h1>
    <a href="Login/home" class="button">Learn More</a>
  </div>
  <div class="split right">
    <h1>Account Login</h1>
    <a href="Login/login" class="button">Login</a>
  </div>
</div>

</body>
</html> 
<script type="text/javascript">
  const left = document.querySelector(".left");
const right = document.querySelector(".right");
const container = document.querySelector(".container");

left.addEventListener("mouseenter", () => {
  container.classList.add("hover-left");
});

left.addEventListener("mouseleave", () => {
  container.classList.remove("hover-left");
});

right.addEventListener("mouseenter", () => {
  container.classList.add("hover-right");
});

right.addEventListener("mouseleave", () => {
  container.classList.remove("hover-right");
});

</script>