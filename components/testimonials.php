<?php
// === COMPONENTE: DEPOIMENTOS (Carrossel com Fade + Modal Print) ===
?>

<section id="depoimentos" class="section depoimentos">
  <h2>Alunos que já transformaram suas jornadas</h2>
  <p>Depoimentos reais de quem se conectou com o Covil do Pai Hiago e vive essa experiência espiritual.</p>

  <div class="swiper depoimentos-swiper">
    <div class="swiper-wrapper">

      <!-- Slide 1 -->
      <div class="swiper-slide">
        <div class="depoimento-item">
          <blockquote>
            “Achei que fosse só mais um curso... mas é uma verdadeira vivência espiritual. Me sinto parte de algo sagrado.”
          </blockquote>
          <div class="autor-area">
            <img src="/assets/img/depoimentos/luana-thumb.jpg" alt="Foto de Luana" class="autor-foto">
            <div>
              <span class="autor">Luana Silva</span> – <span class="local">Rio de Janeiro/RJ</span>
            </div>
          </div>
          <button class="ver-print" data-print="/assets/img/depoimentos/luana.jpg">Ver print</button>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="swiper-slide">
        <div class="depoimento-item">
          <blockquote>
            “O curso do Covil transformou minha visão sobre a Quimbanda. A cada aula, senti uma conexão mais profunda com meus Exus.”
          </blockquote>
          <div class="autor-area">
            <img src="/assets/img/depoimentos/mariana-thumb.jpg" alt="Foto de Mariana" class="autor-foto">
            <div>
              <span class="autor">Mariana Lopes</span> – <span class="local">Salvador/BA</span>
            </div>
          </div>
          <button class="ver-print" data-print="/assets/img/depoimentos/mariana.jpg">Ver print</button>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="swiper-slide">
        <div class="depoimento-item">
          <blockquote>
            “Eu já tinha medo de começar, mas encontrei acolhimento e fundamento. Gratidão ao Pai Hiago e à equipe do Covil!”
          </blockquote>
          <div class="autor-area">
            <img src="/assets/img/depoimentos/rafael-thumb.jpg" alt="Foto de Rafael" class="autor-foto">
            <div>
              <span class="autor">Rafael Almeida</span> – <span class="local">Recife/PE</span>
            </div>
          </div>
          <button class="ver-print" data-print="/assets/img/depoimentos/rafael.jpg">Ver print</button>
        </div>
      </div>

    </div>

    <!-- Controles -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
  </div>
</section>

<!-- Modal para exibir prints -->
<div class="print-modal" id="printModal">
  <div class="print-modal-content">
    <span class="close-modal">&times;</span>
    <img id="printImage" src="" alt="Print do depoimento">
  </div>
</div>
