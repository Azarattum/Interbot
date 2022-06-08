<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INTERBOT</title>
</head>

<body>
  <form action="notify.php" method="post">
    <textarea name="message" id="message" cols="30" rows="10" placeholder="…🖊"></textarea>
    <button type="submit">✉</button>
  </form>
</body>

<style>
  html,
  body {
    margin: 0;
    min-width: 100vw;
    min-height: 100vh;
    display: flex;
    place-items: center;

    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    background: #cdd3f9;
  }

  form {
    margin: auto;
    width: max-content;
    height: max-content;

    padding: 16px;

    border-radius: 16px;
    background: #cdd3f9;
    box-shadow: 33px 33px 65px #9699aa,
      -33px -33px 65px #cccfe6;
  }

  textarea {
    margin-bottom: 16px;
    padding: 8px;

    font-size: 1.5rem;

    color: #313438;
    border-radius: 8px;
    background: #cdd3f9;
    box-shadow: inset 23px 23px 46px #aeb3d4,
      inset -23px -23px 46px #ecf3ff;
  }

  button {
    display: block;
    width: 100%;
    padding: 4px;

    font-size: 2rem;
    font-weight: bold;

    color: #313438;
    border-radius: 8px;
    background: linear-gradient(145deg, #b9bee0, #dbe2ff);
    box-shadow: 4px 4px 8px #aeb3d4,
      -4px -4px 8px #ecf3ff;

    cursor: pointer;
    transition: color 0.2s;
  }

  button:hover {
    color: #2b43e3;
  }

  button:active {
    border-radius: 8px;
    background: linear-gradient(145deg, #dbe2ff, #b9bee0);
    box-shadow: 4px 4px 8px #aeb3d4,
      -4px -4px 8px #ecf3ff;
  }

  textarea,
  button {
    outline: none;
    border: none;
  }
</style>

</html>