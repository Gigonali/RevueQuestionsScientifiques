import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabLivresComponent } from './tab-livres.component';

describe('TabLivresComponent', () => {
  let component: TabLivresComponent;
  let fixture: ComponentFixture<TabLivresComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabLivresComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabLivresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
