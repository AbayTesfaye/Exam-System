<x-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/icon-font.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />

    <title>Quiz Website</title>
  </head>
  <body>
    <header class="header">

      <div class="header__text-box">
        <h1 class="heading-primary">
          <span class="heading-primary--main">Welcome</span>
          <span class="heading-primary--sub">to Our Quiz</span>
        </h1>
        <p class="heading-primary--description">Test your knowledge with our fun quiz. Are you ready?</p>
        <a href="{{ route('login') }}" class="btn btn--white btn--animation">Get Started</a>
      </div>
    </header>

    <style>
      .header__text-box {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
      }

      .heading-primary {
        color: #fff;
        text-transform: uppercase;
        margin-bottom: 2rem;
      }

      .heading-primary--main {
        display: block;
        font-size: 5rem;
        font-weight: 400;
        letter-spacing: 3.5rem;
        animation: MoveInLeft 1s ease-out;
      }

      .heading-primary--sub {
        font-size: 2rem;
        font-weight: 700;
        letter-spacing: 1.75rem;
        animation: MoveInRight 3s ease-out;
      }

      .heading-primary--description {
        font-size: 1.6rem;
        color: #fff;
        margin-bottom: 2rem;
        animation: MoveInBottom 2s ease-out;
      }

      @keyframes MoveInLeft {
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

      @keyframes MoveInRight {
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

      @keyframes MoveInBottom {
        0% {
          opacity: 0;
          transform: translateY(10rem);
        }
        100% {
          opacity: 1;
          transform: translate(0);
        }
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
        background-color: #fff;
        color: #777;
      }

      .btn--white::after {
        background-color: #fff;
      }

      .btn::after {
        content: "";
        display: inline-block;
        height: 100%;
        width: 100%;
        border-radius: 1rem;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        transition: all 0.4s;
      }

      .btn--animation {
        animation: MoveInBottom 1s ease-out 0.75s;
        animation-fill-mode: backwards;
      }
    </style>
  </body>
</html>
</x-layout>
