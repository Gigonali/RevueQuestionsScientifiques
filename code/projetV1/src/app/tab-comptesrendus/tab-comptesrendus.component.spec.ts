import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabComptesrendusComponent } from './tab-comptesrendus.component';

describe('TabComptesrendusComponent', () => {
  let component: TabComptesrendusComponent;
  let fixture: ComponentFixture<TabComptesrendusComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabComptesrendusComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabComptesrendusComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
