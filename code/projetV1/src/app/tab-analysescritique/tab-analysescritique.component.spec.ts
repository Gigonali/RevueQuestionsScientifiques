import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabAnalysescritiqueComponent } from './tab-analysescritique.component';

describe('TabAnalysescritiqueComponent', () => {
  let component: TabAnalysescritiqueComponent;
  let fixture: ComponentFixture<TabAnalysescritiqueComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabAnalysescritiqueComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabAnalysescritiqueComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
