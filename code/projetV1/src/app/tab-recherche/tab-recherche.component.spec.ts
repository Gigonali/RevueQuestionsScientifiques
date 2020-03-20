import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabRechercheComponent } from './tab-recherche.component';

describe('TabRechercheComponent', () => {
  let component: TabRechercheComponent;
  let fixture: ComponentFixture<TabRechercheComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabRechercheComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabRechercheComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
