<style>
    :root {
  --blue: #6495ed;
  --white: #faf0e6;
  --colorA: #a7d397;
}

.container {
  width: auto;
  height: auto;
  padding: 5px;
  display: flex;
  /* flex-wrap: wrap; */
  justify-content: center;
}

.content {
  display: flex;
  columns: 3;
  flex-wrap: wrap;
  /* margin: auto; */
  justify-content: center;
}

img {
  width: 200px;
  height: 200px;
  padding: 0px;
  display: block;
}

.card {
  display: inline-block;
  width: 200px;
  height: 350px;
  border: none;
  padding: 5px;
  margin: 5px;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.7);
}

.card button {
  padding: 5px;
  background-color: rgb(255, 255, 86);
  font-family: Arial, Helvetica, sans-serif;
  border-radius: 20px;
  border-style: solid;
  font-weight: bold;
  border-width: 1px;
  cursor: pointer;
  transition: 0.3s;
}

.card button:hover {
  background-color: rgb(0, 0, 0);
  color: rgb(255, 255, 86);
  border-color: rgb(172, 172, 26);
  border-style: solid;
  border-width: 2px;
}

.card button:active {
  color: black;
  background-color: white;
  opacity: 0.5;
  box-shadow: 0px 0px 5px rgb(172, 172, 26);
}

.prcbtn {
  display: flex;
  justify-content: end;
  padding: 2px;
  margin: 4px;
}

.button-grup {
  display: flex;
  justify-content: center;
}
.tombol-nav {
  padding: 4px;
  margin: 3px;
}

.navbar {
    margin: auto;
  background-color: #1F6E8C;
  font-size: larger;
  color: white;
  padding: 10px 10px;
}

.navbar ul {
  list-style-type: none;
}
.navbar li {
  display: inline;
  padding: 0 10px;
}
</style>

<div class="navbar">
            <ul>
                <li><a href="../" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; color: white;">Home</a></li>
                <li><a href="/about" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; color: white;">About</a></li>
                <li class="dropdown">
                    <a href="/catalog/" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; color: white;">Catalog</a>
                </li>
                <li> <a href="/article" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; color: white;">Article</a></li>
                <li style="float: right">
                    <a href="/login/" style="text-decoration: none; font-family: Arial, Helvetica, sans-serif; color: white;">Login</a>
                </li>
            </ul>
        </div>
