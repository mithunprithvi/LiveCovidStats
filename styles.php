body {
  background-color: pink; /* For browsers that do not support gradients */
  background-image: linear-gradient(pink, violet);
}
header{
 
  text-align: right;
  background-color: var(--secondary-color);
  color: white;

}
.btn {
  background-color: #27c9df!important;
}
h1 {font-family: Cabin;
  text-align: center;
}
h2{font-family: Roboto;

}
h3{
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}


.grid {
  width: 90%;
  max-width: 80rem;
  margin: 2rem auto;
  display: grid;
  grid-template-columns: repeat(3, minmax(100px, 1fr));
  grid-gap: 1.5rem;
}