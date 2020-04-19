import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ReinitialitionMdpComponent } from './reinitialition-mdp.component';

describe('ReinitialitionMdpComponent', () => {
  let component: ReinitialitionMdpComponent;
  let fixture: ComponentFixture<ReinitialitionMdpComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ReinitialitionMdpComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReinitialitionMdpComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
