import { Component, OnInit, HostListener } from '@angular/core';
import {NgbCarouselConfig} from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-carousel',
  templateUrl: './carousel.component.html',
  styleUrls: ['./carousel.component.css']
})
export class CarouselComponent implements OnInit {
  // taille écran
  public innerWidth: any;

  // images array
  images = [1, 2, 3, 4, 5, 6].map((n) => `../assets/img/slider_accueilGeneral/slide${n}.jpg`);

  constructor(config: NgbCarouselConfig) {
    // customize default values of carousels used by this component tree
    config.interval = 10000;
    config.showNavigationArrows = false;
    config.wrap = false;
    config.keyboard = false;
    config.pauseOnHover = false;
  }

  ngOnInit(): void {
    this.innerWidth = window.innerWidth;
  }

  // Pour mettre à jour la taille si la
  // fenêtre est redimensionée
  @HostListener('window:resize', ['$event'])
  onResize(event) {
    this.innerWidth = window.innerWidth;
  }

}
