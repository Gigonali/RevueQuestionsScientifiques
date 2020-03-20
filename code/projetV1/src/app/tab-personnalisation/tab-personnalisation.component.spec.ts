import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabPersonnalisationComponent } from './tab-personnalisation.component';

describe('TabPersonnalisationComponent', () => {
  let component: TabPersonnalisationComponent;
  let fixture: ComponentFixture<TabPersonnalisationComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabPersonnalisationComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabPersonnalisationComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
