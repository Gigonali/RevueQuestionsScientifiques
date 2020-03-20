import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EcheanceListComponent } from './echeance-list.component';

describe('EcheanceListComponent', () => {
  let component: EcheanceListComponent;
  let fixture: ComponentFixture<EcheanceListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EcheanceListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EcheanceListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
