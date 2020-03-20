import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { GestioHomeComponent } from './gestio-home.component';

describe('GestioHomeComponent', () => {
  let component: GestioHomeComponent;
  let fixture: ComponentFixture<GestioHomeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ GestioHomeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(GestioHomeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
