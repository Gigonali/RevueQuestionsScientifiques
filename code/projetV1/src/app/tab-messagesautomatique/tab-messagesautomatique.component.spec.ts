import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TabMessagesautomatiqueComponent } from './tab-messagesautomatique.component';

describe('TabMessagesautomatiqueComponent', () => {
  let component: TabMessagesautomatiqueComponent;
  let fixture: ComponentFixture<TabMessagesautomatiqueComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TabMessagesautomatiqueComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TabMessagesautomatiqueComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
