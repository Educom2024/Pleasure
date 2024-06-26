@charset "UTF-8";
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  font-size: 1rem;
}

a {
  text-decoration: none;
  list-style: none;
}

a, span {
  display: inline-block;
}

ul, ol {
  list-style: none;
}

.contenedor {
  max-width: 87rem;
  margin-left: auto;
  margin-right: auto;
}

.nav__menu {
  background-color: #0aa78b;
  margin-top: 0.6rem;
  display: flex;
  justify-content: space-between;
  padding: 0.3rem;
  align-items: center;
  font-family: "Madimi One", sans-serif;
  text-transform: uppercase;
  align-items: center;
}
.nav__menu--logo {
  width: 13rem;
  margin-left: 2rem;
}
.nav__menu__box {
  display: flex;
  align-items: center;
  position: relative;
}
.nav__menu__box__cart {
  margin-right: 2rem;
  font-size: 1.35rem;
  color: white;
  display: flex;
}
.nav__menu__box__cart__shop {
  padding: 0.6rem;
}
.nav__menu__box span {
  background-color: #0aa78b;
  width: 1rem;
  height: 1rem;
  display: flex;
  font-size: 0.7rem;
  justify-content: center;
  align-items: center;
  border-radius: 10rem;
  position: absolute;
  top: -0.6rem;
  right: 4.7rem;
  border: 0.1px solid white;
  color: white;
  margin-top: 1.3rem;
  margin-right: 2.5rem;
  padding-top: 0.07rem;
}
.nav__menu__box__caja {
  display: flex;
  margin-right: 4rem;
}
.nav__menu__box__caja__elements--link {
  padding: 1.5rem;
  display: inline-block;
  color: white;
}
.nav__menu__box__caja__elements--link i {
  font-size: 0.8rem;
}

.portada__top {
  background-image: url(../../img/portada.jpg);
}
.portada__top__fondo {
  display: flex;
}
.portada__top__fondo__reseña {
  background-color: aqua;
  width: 20rem;
  height: 10rem;
}
.portada__top__fondo__reseña__beneficios {
  background-color: aquamarine;
  height: 10rem;
}

/*# sourceMappingURL=estilos.cs.map */
