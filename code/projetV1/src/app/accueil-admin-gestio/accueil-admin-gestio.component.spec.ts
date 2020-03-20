import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AccueilAdminGestioComponent } from './accueil-admin-gestio.component';

describe('AccueilAdminGestioComponent', () => {
  let component: AccueilAdminGestioComponent;
  let fixture: ComponentFixture<AccueilAdminGestioComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AccueilAdminGestioComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AccueilAdminGestioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
