import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabParametredeconnexionComponent } from './tab-parametredeconnexion.component';

describe('TabParametredeconnexionComponent', () => {
  let component: TabParametredeconnexionComponent;
  let fixture: ComponentFixture<TabParametredeconnexionComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabParametredeconnexionComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabParametredeconnexionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
