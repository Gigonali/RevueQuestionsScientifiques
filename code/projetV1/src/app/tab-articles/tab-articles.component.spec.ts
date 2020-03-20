import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabArticlesComponent } from './tab-articles.component';

describe('TabArticlesComponent', () => {
  let component: TabArticlesComponent;
  let fixture: ComponentFixture<TabArticlesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabArticlesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabArticlesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
