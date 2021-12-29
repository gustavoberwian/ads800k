<style>
  main.cards {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 32px;
  }

  main.cards section.card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    background: white;
    padding: 1rem 1.5rem;
    border-radius: 8px;
    max-height: 468px;
    margin-left: 32px;
  }

  main.cards section.card:first-child {
    margin-left: 0;
  }

  main.cards section.card .icon {
      font-size: 32px;
    width: 64px;
    height: 64px;
    padding-top: 16px;
  }

  main.cards section.card img {
    width: 100%;
  }

  main.cards section.card h3 {
    font-size: 100%;
    margin: 16px 0;
  }

  main.cards section.card span {
    font-weight: 300;
    max-width: 240px;
    font-size: 80%;
    margin-bottom: 16px;
  }

  main.cards section.card button  {
    padding: 0.5rem 1rem;
    text-transform: uppercase;
    border-radius: 32px;
    border: 0;
    cursor: pointer;
    font-size: 80%;
    margin-bottom: 16px 0;
  }

section.card button a{
    text-decoration: none;
    color: #fff;
    font-weight: 500;

  }

  main.cards section.card.contact button {
    background: linear-gradient(to right, #11101d, rgb(119, 119, 119));
  }
  main.cards section.card.shop button {
    background: linear-gradient(to right, #11101d, rgb(119, 119, 119));
  }
  main.cards section.card.about button {
    background: linear-gradient(to right, #11101d, rgb(119, 119, 119));
  }

  main.cards section.card.contact {
    box-shadow: 20px 20px 50px -30px #11101db0;
  }
  main.cards section.card.shop {
    box-shadow: 20px 20px 50px -30px #11101db0;
  }
  main.cards section.card.about {
    box-shadow: 20px 20px 50px -30px #11101db0;
  }

  @media screen and (max-width: 720px) {
    main.cards {
      flex-direction: column;
    }

    main.cards section.card {
      margin-left: 0;
      margin-bottom: 32px;
    }

    main.cards section.card:last-child {
      margin-bottom: 0;
    }

    main.cards section.card button {
      font-size: 70%;
    }
  }


  .main_container{
      display: flex;
      flex-direction: column;
      align-content: center;
      justify-content: center;
  }
</style>

<div class="nHeader">
    <div class="logo">ADVS</div>
</div>

<div class="main_container">
    <main class="cards">
        <section class="card contact">
          <div class="icon">
              <i class="fas fa-sitemap"></i>
          </div>
          <h3>Alterar Sub-domínio</h3>
          <span>Alterar o nome da sub-pasta do domínio</span>
          <button><a href="?p=alterar_subdomain">ACESSAR</a></button>
        </section>
        <section class="card shop">
          <div class="icon">
              <i class="far fa-clone"></i>
          </div>
          <h3>Duplicar</h3>
          <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
          <button><a href="?p=duplicar">ACESSAR</a></button>
        </section>
        <section class="card about">
          <div class="icon">
              <i class="fas fa-folder-plus"></i>
          </div>
          <h3>Novo Dominio</h3>
          <span>Alterar domínio do Website</span>
          <button><a href="?p=novo_dominio">ACESSAR</a></button>
        </section>
      </main>
      
      <main class="cards">
          <section class="card shop">
            <div class="icon">
              <i class="fas fa-random"></i>
            </div>
            <h3>Substituir ADV</h3>
            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
            <button><a href="?p=substituir_adv">ACESSAR</a></button>
          </section>
          <section class="card about">
            <div class="icon">
              <i class="far fa-edit"></i>
            </div>
            <h3>Alterar Pré</h3>
            <span>Alterar/Adicionar pré em uma domínio</span>
            <button><a href="?p=trocar_pre">ACESSAR</a></button>
          </section>
      </main>
</div>

  
